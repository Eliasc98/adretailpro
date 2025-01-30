<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the advertisements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::forSeller(Auth::id())->latest()->paginate(10);
        return view('dashboard.manage-ad', compact('advertisements'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|in:homepage,sidebar,footer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'category' => 'nullable|string',
            'priority' => 'nullable|integer'
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('advertisements', 'public');
        }

        $advertisement = Advertisement::create([
            'title' => $validated['title'],
            'image_path' => $imagePath,
            'description' => $validated['description'] ?? null,
            'link' => $validated['link'] ?? null,
            'position' => $validated['position'],
            'start_date' => $validated['start_date'] ?? null,
            'end_date' => $validated['end_date'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'user_id' => Auth::id(),
            'category' => $validated['category'] ?? null,
            'priority' => $validated['priority'] ?? 0
        ]);

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
        $this->authorize('update', $advertisement);

        return view('dashboard.edit-ad', compact('advertisement'));
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
        $this->authorize('update', $advertisement);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|in:homepage,sidebar,footer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'category' => 'nullable|string',
            'priority' => 'nullable|integer'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($advertisement->image_path) {
                Storage::disk('public')->delete($advertisement->image_path);
            }
            $imagePath = $request->file('image')->store('advertisements', 'public');
            $advertisement->image_path = $imagePath;
        }

        $advertisement->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'link' => $validated['link'] ?? null,
            'position' => $validated['position'],
            'start_date' => $validated['start_date'] ?? null,
            'end_date' => $validated['end_date'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'category' => $validated['category'] ?? null,
            'priority' => $validated['priority'] ?? 0
        ]);

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
        $this->authorize('delete', $advertisement);

        // Delete advertisement image
        if ($advertisement->image_path) {
            Storage::disk('public')->delete($advertisement->image_path);
        }

        $advertisement->delete();

        return redirect()->route('dashboard.advertisements')
            ->with('success', 'Advertisement deleted successfully.');
    }
}
