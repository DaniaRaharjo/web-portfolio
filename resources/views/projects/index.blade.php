<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- This is where your project grid will go -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($projects as $project)
                        <div class="border rounded-lg p-4 shadow-sm">
                            <h3 class="text-lg font-bold">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
                            <a href="{{ route('projects.show', $project) }}" class="text-blue-500 hover:underline">View Details</a>
                        </div>
                    @empty
                        <p>No projects found. <a href="{{ route('projects.create') }}" class="text-blue-500">Add one now?</a></p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>