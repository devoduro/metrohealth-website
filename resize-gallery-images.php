<?php
/**
 * Gallery Image Resizer Script
 * Resizes all images in public/images/gallery to web-optimized sizes
 */

$sourceDir = __DIR__ . '/public/images/gallery/';
$outputDir = __DIR__ . '/public/images/gallery/resized/';

// Create output directory if it doesn't exist
if (!file_exists($outputDir)) {
    mkdir($outputDir, 0755, true);
}

// Target dimensions for web
$maxWidth = 1200;
$maxHeight = 800;
$quality = 85; // JPEG quality (0-100)

// Get all image files
$images = glob($sourceDir . '*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

echo "Found " . count($images) . " images to resize\n";
echo "Output directory: $outputDir\n";
echo "Max dimensions: {$maxWidth}x{$maxHeight}\n";
echo "Quality: {$quality}%\n\n";

$processed = 0;
$skipped = 0;

foreach ($images as $imagePath) {
    $filename = basename($imagePath);
    $outputPath = $outputDir . $filename;
    
    // Skip if already resized
    if (file_exists($outputPath)) {
        echo "SKIP: $filename (already exists)\n";
        $skipped++;
        continue;
    }
    
    // Get image info
    $imageInfo = getimagesize($imagePath);
    if (!$imageInfo) {
        echo "ERROR: Could not read $filename\n";
        continue;
    }
    
    list($originalWidth, $originalHeight, $imageType) = $imageInfo;
    
    // Calculate new dimensions maintaining aspect ratio
    $ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
    
    // Only resize if image is larger than target
    if ($ratio >= 1) {
        echo "SKIP: $filename (already smaller than target)\n";
        copy($imagePath, $outputPath);
        $skipped++;
        continue;
    }
    
    $newWidth = round($originalWidth * $ratio);
    $newHeight = round($originalHeight * $ratio);
    
    // Create source image
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($imagePath);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($imagePath);
            break;
        default:
            echo "ERROR: Unsupported image type for $filename\n";
            continue 2;
    }
    
    if (!$sourceImage) {
        echo "ERROR: Could not create image resource for $filename\n";
        continue;
    }
    
    // Create new image
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    
    // Preserve transparency for PNG
    if ($imageType == IMAGETYPE_PNG) {
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
        imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
    }
    
    // Resize
    imagecopyresampled(
        $newImage, $sourceImage,
        0, 0, 0, 0,
        $newWidth, $newHeight,
        $originalWidth, $originalHeight
    );
    
    // Save
    $success = false;
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $success = imagejpeg($newImage, $outputPath, $quality);
            break;
        case IMAGETYPE_PNG:
            $success = imagepng($newImage, $outputPath, 9);
            break;
    }
    
    // Clean up
    imagedestroy($sourceImage);
    imagedestroy($newImage);
    
    if ($success) {
        $originalSize = filesize($imagePath);
        $newSize = filesize($outputPath);
        $savings = round((1 - $newSize / $originalSize) * 100, 1);
        
        echo "DONE: $filename ({$originalWidth}x{$originalHeight} -> {$newWidth}x{$newHeight}) ";
        echo "Size: " . round($originalSize / 1024 / 1024, 2) . "MB -> " . round($newSize / 1024 / 1024, 2) . "MB ";
        echo "({$savings}% reduction)\n";
        $processed++;
    } else {
        echo "ERROR: Could not save $filename\n";
    }
}

echo "\n=== SUMMARY ===\n";
echo "Processed: $processed\n";
echo "Skipped: $skipped\n";
echo "Total: " . count($images) . "\n";
echo "\nResized images saved to: $outputDir\n";
