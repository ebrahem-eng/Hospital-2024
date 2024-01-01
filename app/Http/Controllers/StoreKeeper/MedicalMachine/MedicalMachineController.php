<?php

namespace App\Http\Controllers\StoreKeeper\MedicalMachine;

use App\Http\Controllers\Controller;
use App\Models\MedicalMachine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicalMachineController extends Controller
{

    //عرض صفحة جدول الاجهزة الطبية

    public function index()
    {
        $medicalMachines = MedicalMachine::all();
        return view('StoreKeeper.MedicalMachine.index', compact('medicalMachines'));
    }

    //عرض صفحة اضافة جهاز طبي جديد جديد 

    public function create()
    {
        return view('StoreKeeper.MedicalMachine.create');
    }

    //تخزين الاجهزة الطبية في قاعدة البيانات 

    public function store(Request $request)
    {

        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('MedicalMachine', $image, 'image');

        MedicalMachine::create([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'status' => $request->input('status'),
            'quantity' => $request->input('quantity'),
            'img' => $path,
            'created_by' => Auth::guard('storeKeeper')->user()->id,
        ]);

        return redirect()->route('storeKeeper.medicalMachine.index')->with('success_message', 'MedicalMachine Created Successfully');
    }

    //عرض صفحة تعديل بيانات جهاز طبي 

    public function edit($id)
    {
        $medicalMachine = MedicalMachine::findOrfail($id);
        return view('StoreKeeper.MedicalMachine.edit', compact('medicalMachine'));
    }

    //تعديل بيانات جهاز طبي داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $medicalMachine = MedicalMachine::findOrFail($id);

        if ($request->file('img') == null) {
            $medicalMachine->update([
                'name' => $request->input('name'),
                'details' => $request->input('details'),
                'status' => $request->input('status'),
                'quantity' => $request->input('quantity'),
            ]);

            return redirect()->route('storeKeeper.medicalMachine.index')->with('success_message', 'Medical Machine Updated Successfully');
        } else {
            if ($medicalMachine->img != null) {
                Storage::disk('image')->delete($medicalMachine->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('MedicalMachine', $image, 'image');

                $medicalMachine->update([
                    'name' => $request->input('name'),
                    'details' => $request->input('details'),
                    'status' => $request->input('status'),
                    'quantity' => $request->input('quantity'),
                    'img' => $path,
                ]);

                return redirect()->route('storeKeeper.medicalMachine.index')->with('success_message', 'Medical Machine Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('MedicalMachine', $image, 'image');

                $medicalMachine->update([
                    'name' => $request->input('name'),
                    'details' => $request->input('details'),
                    'status' => $request->input('status'),
                    'quantity' => $request->input('quantity'),
                    'img' => $path,
                ]);

                return redirect()->route('storeKeeper.medicalMachine.index')->with('success_message', 'Medical Machine Updated Successfully');
            }
        }
    }

    //حذف جهاز طبي ونقله للارشيف 

    public function softDelete($id)
    {
        $medicalMachine = MedicalMachine::findOrFail($id);

        $medicalMachine->delete();

        return redirect()->route('storeKeeper.medicalMachine.index')->with('success_message', 'Medical Machine Deleted Successfully');
    }
}
