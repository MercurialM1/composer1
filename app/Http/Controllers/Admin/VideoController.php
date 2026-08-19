<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('order')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video_mp4' => 'nullable|file|mimes:mp4,mov|max:102400',
            'video_webm' => 'nullable|file|mimes:webm|max:102400',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('video_mp4')) {
            $validated['video_mp4'] = $request->file('video_mp4')->store('videos', 'public');
        }

        if ($request->hasFile('video_webm')) {
            $validated['video_webm'] = $request->file('video_webm')->store('videos', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Video::create($validated);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Видео успешно добавлено!');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video_mp4' => 'nullable|file|mimes:mp4,mov|max:102400',
            'video_webm' => 'nullable|file|mimes:webm|max:102400',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('video_mp4')) {
            if ($video->video_mp4) {
                Storage::disk('public')->delete($video->video_mp4);
            }
            $validated['video_mp4'] = $request->file('video_mp4')->store('videos', 'public');
        }

        if ($request->hasFile('video_webm')) {
            if ($video->video_webm) {
                Storage::disk('public')->delete($video->video_webm);
            }
            $validated['video_webm'] = $request->file('video_webm')->store('videos', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $video->update($validated);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Видео успешно обновлено!');
    }

    public function destroy(Video $video)
    {
        if ($video->video_mp4) {
            Storage::disk('public')->delete($video->video_mp4);
        }
        if ($video->video_webm) {
            Storage::disk('public')->delete($video->video_webm);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'Видео удалено!');
    }
}
