<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the advertisements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Paginate advertisements for the dashboard view
        $advertisements = Advertisement::latest()->paginate(12);
        return view('dashboard.advertisements', compact('advertisements'));
    }

    /**
     * Show the form for creating a new advertisement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create-ad');
    }

    /**
     * Store a newly created advertisement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|in:homepage,sidebar,footer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('advertisements', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Add user_id if needed
        $validated['user_id'] = Auth::id();

        $advertisement = Advertisement::create($validated);

        return redirect()->route('dashboard.advertisements')
            ->with('success', 'Advertisement created successfully.');
    }

    /**
     * Show the form for editing the specified advertisement.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        // Ensure the user can only edit their own advertisements
        if (Gate::denies('update', $advertisement)) {
            abort(403, 'You are not authorized to edit this advertisement.');
        }
        
        return view('dashboard.create-ad', compact('advertisement'));
    }

    /**
     * Update the specified advertisement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        // Ensure the user can only update their own advertisements
        if (Gate::denies('update', $advertisement)) {
            abort(403, 'You are not authorized to update this advertisement.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|in:homepage,sidebar,footer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($advertisement->image_path) {
                Storage::disk('public')->delete($advertisement->image_path);
            }

            $imagePath = $request->file('image')->store('advertisements', 'public');
            $validated['image_path'] = $imagePath;
        }

        $advertisement->update($validated);

        return redirect()->route('dashboard.advertisements')
            ->with('success', 'Advertisement updated successfully.');
    }

    /**
     * Remove the specified advertisement from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        // Ensure the user can only delete their own advertisements
        if (Gate::denies('delete', $advertisement)) {
            abort(403, 'You are not authorized to delete this advertisement.');
        }

        // Delete image if exists
        if ($advertisement->image_path) {
            Storage::disk('public')->delete($advertisement->image_path);
        }

        $advertisement->delete();

        return redirect()->route('dashboard.advertisements')
            ->with('success', 'Advertisement deleted successfully.');
    }
}
