<?php

namespace App\Http\Controllers\StoreKeeper\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{

    //عرض صفحة جدول الادوية

    public function index()
    {
        $medicines = Medicine::all();
        return view('StoreKeeper.Medicine.index', compact('medicines'));
    }

    //عرض صفحة اضافة دواء جديد 

    public function create()
    {
        return view('StoreKeeper.Medicine.create');
    }

    //تخزين موظفين الاقسام في قاعدة البيانات 

    public function store(Request $request)
    {

        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('MedicineImage', $image, 'image');

        Medicine::create([
            'name' => $request->input('name'),
            'calibres' => $request->input('calibres'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'img' => $path,
            'created_by' => Auth::guard('storeKeeper')->user()->id,
        ]);

        return redirect()->route('storeKeeper.medicine.index')->with('success_message', 'Medicine Created Successfully');
    }

    //عرض صفحة تعديل بيانات دواء 

    public function edit($id)
    {
        $medicine = Medicine::findOrfail($id);
        return view('StoreKeeper.Medicine.edit', compact('medicine'));
    }

    //تعديل بيانات دواء داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $medicine = Medicine::findOrFail($id);

        if ($request->file('img') == null) {
            $medicine->update([
                'name' => $request->input('name'),
                'calibres' => $request->input('calibres'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('price'),
                'details' => $request->input('details'),
            ]);

            return redirect()->route('storeKeeper.medicine.index')->with('success_message', 'Medicine Updated Successfully');
        } else {
            if ($medicine->img != null) {
                Storage::disk('image')->delete($medicine->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('MedicineImage', $image, 'image');

                $medicine->update([
                    'name' => $request->input('name'),
                    'calibres' => $request->input('calibres'),
                    'quantity' => $request->input('quantity'),
                    'price' => $request->input('price'),
                    'details' => $request->input('details'),
                    'img' => $path,
                ]);

                return redirect()->route('storeKeeper.medicine.index')->with('success_message', 'Medicine Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('MedicineImage', $image, 'image');

                $medicine->update([
                    'name' => $request->input('name'),
                    'calibres' => $request->input('calibres'),
                    'quantity' => $request->input('quantity'),
                    'price' => $request->input('price'),
                    'details' => $request->input('details'),
                    'img' => $path,
                ]);

                return redirect()->route('storeKeeper.medicine.index')->with('success_message', 'Medicine Updated Successfully');
            }
        }
    }

    //حذف دواء ونقله للارشيف 

    public function softDelete($id)
    {
        $medicine = Medicine::findOrFail($id);

        $medicine->delete();

        return redirect()->route('storeKeeper.medicine.index')->with('success_message', 'Medicine Deleted Successfully');
    }
}
