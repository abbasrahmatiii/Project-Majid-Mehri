<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCenterAdRequest;
use App\Http\Requests\UpdateCenterAdRequest;
use App\Models\CenterAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CenterAdController extends Controller
{
    public function index()
    {
        $centerAds = CenterAd::paginate(10);
        return view('admin.centerad.index', compact('centerAds'));
    }

    public function create()
    {
        return view('admin.centerad.create');
    }

    public function store(StoreCenterAdRequest $request)
    {
        $imagePath = $request->file('image')->store('center_ads', 'public');

        CenterAd::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.centerads.index')->with('success', 'تبلیغ جدید با موفقیت ایجاد شد.');
    }

    public function edit(CenterAd $centerad)
    {
        return view('admin.centerad.edit', compact('centerad'));
    }

    public function update(UpdateCenterAdRequest $request, CenterAd $centerad)
    {
        if ($request->hasFile('image')) {
            if ($centerad->image && Storage::disk('public')->exists($centerad->image)) {
                Storage::disk('public')->delete($centerad->image);
            }
            $imagePath = $request->file('image')->store('center_ads', 'public');
            $centerad->image = $imagePath;
        }

        $centerad->title = $request->title;
        $centerad->description = $request->description;
        $centerad->is_active = $request->is_active;
        $centerad->save();

        return redirect()->route('admin.centerads.index')->with('success', 'تبلیغ با موفقیت ویرایش شد.');
    }

    public function destroy(CenterAd $centerad)
    {
        if ($centerad->image && Storage::disk('public')->exists($centerad->image)) {
            Storage::disk('public')->delete($centerad->image);
        }

        $centerad->delete();

        return redirect()->route('admin.centerads.index')->with('success', 'تبلیغ با موفقیت حذف شد.');
    }

    public function toggleActive(Request $request, $id)
    {
        $centerAd = CenterAd::findOrFail($id);
        $centerAd->is_active = $request->is_active;
        $centerAd->save();

        $message = $centerAd->is_active ? 'تبلیغ با موفقیت فعال شد.' : 'تبلیغ با موفقیت غیرفعال شد.';

        // Add message to session for the next request
        session()->flash('success', $message);

        return response()->json(['success' => true, 'message' => $message]);
    }
}
