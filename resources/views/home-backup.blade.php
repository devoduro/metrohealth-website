<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Professional IT Services</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>{{ config('app.name') }}</h1>
        <p>Professional IT Corporate Solutions</p>
    </header>

    <section class="stats">
        <div class="stat-card">
            <h3>{{ $stats['total_projects'] }}</h3>
            <p>Projects Completed</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['team_members'] }}</h3>
            <p>Team Members</p>
        </div>
    </section>

    <section class="services">
        <h2>Our Services</h2>
        <div class="services-grid">
            @foreach($services as $service)
                <div class="service-card">
                    <h3>{{ $service->name }}</h3>
                    <p>{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="team">
        <h2>Our Team</h2>
        <div class="team-grid">
            @foreach($teamMembers as $member)
                <div class="team-card">
                    <h4>{{ $member->name }}</h4>
                    <p>{{ $member->position }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="projects">
        <h2>Recent Projects</h2>
        <div class="projects-grid">
            @foreach($projects as $project)
                <div class="project-card">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <footer>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>
</body>
</html>
