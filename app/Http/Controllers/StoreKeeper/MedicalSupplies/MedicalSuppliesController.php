<?php

namespace App\Http\Controllers\StoreKeeper\MedicalSupplies;

use App\Http\Controllers\Controller;
use App\Models\MedicalSupplies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicalSuppliesController extends Controller
{

    //عرض صفحة جدول المستلزمات الطبية

    public function index()
    {
        $medicalSupplieses = MedicalSupplies::all();
        return view('StoreKeeper.MedicalSupplies.index', compact('medicalSupplieses'));
    }

    //عرض صفحة اضافة مستلزم طبي جديد جديد 

    public function create()
    {
        return view('StoreKeeper.MedicalSupplies.create');
    }

    //تخزين المستلزمات الطبية في قاعدة البيانات 

    public function store(Request $request)
    {

        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('MedicalSupplies', $image, 'image');

        MedicalSupplies::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'details' => $request->input('details'),
            'status' => $request->input('status'),
            'quantity' => $request->input('quantity'),
            'img' => $path,
            'created_by' => Auth::guard('storeKeeper')->user()->id,
        ]);

        return redirect()->route('storeKeeper.medicalSupplies.index')->with('success_message', 'Medical Supplies Created Successfully');
    }

    //عرض صفحة تعديل بيانات مستلزم طبي 

    public function edit($id)
    {
        $medicalSupplies = MedicalSupplies::findOrfail($id);
        return view('StoreKeeper.MedicalSupplies.edit', compact('medicalSupplies'));
    }

    //تعديل بيانات مستلزم طبي داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $medicalSupplies = MedicalSupplies::findOrFail($id);

        if ($request->file('img') == null) {
            $medicalSupplies->update([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'details' => $request->input('details'),
                'status' => $request->input('status'),
                'quantity' => $request->input('quantity'),
            ]);

            return redirect()->route('storeKeeper.medicalSupplies.index')->with('success_message', 'Medical Supplies Updated Successfully');
        } else {
            if ($medicalSupplies->img != null) {
                Storage::disk('image')->delete($medicalSupplies->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('MedicalSupplies', $image, 'image');

                $medicalSupplies->update([
                    'name' => $request->input('name'),
                    'type' => $request->input('type'),
                    'details' => $request->input('details'),
                    'status' => $request->input('status'),
                    'quantity' => $request->input('quantity'),
                    'img' => $path,
                ]);

                return redirect()->route('storeKeeper.medicalSupplies.index')->with('success_message', 'Medical Supplies Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('MedicalSupplies', $image, 'image');

                $medicalSupplies->update([
                    'name' => $request->input('name'),
                    'type' => $request->input('type'),
                    'details' => $request->input('details'),
                    'status' => $request->input('status'),
                    'quantity' => $request->input('quantity'),
                    'img' => $path,
                ]);

                return redirect()->route('storeKeeper.medicalSupplies.index')->with('success_message', 'Medical Supplies Updated Successfully');
            }
        }
    }

    public function deleteCustomQuantity(Request $request , $id)
    {
        $medicalSupplies = MedicalSupplies::findOrFail($id);
        $deletedQuantity = $request->input('deletedQuantity');
        $originalQuantity = $medicalSupplies->quantity;

        if($deletedQuantity > $medicalSupplies->quantity)
        {
            return redirect()->back()->with('error_message', 'The Deleted Medical Supplies Bigest Than The Original Quantity Successfully'); 
        }else if($deletedQuantity == $medicalSupplies->quantity)
        {
            $newMedicalSuppliesQuantity = $originalQuantity - $deletedQuantity;
            $medicalSupplies->update([
                'quantity' => $newMedicalSuppliesQuantity,
                'deletedQuantity' => $medicalSupplies->deletedQuantity + $deletedQuantity,
            ]); 
            // $medicalSupplies->delete();

            return redirect()->back()->with('success_message', 'Medical Supplies Deleted Successfully');
        }else
        {
            $newMedicalSuppliesQuantity = $originalQuantity - $deletedQuantity;
            $medicalSupplies->update([
                'quantity' => $newMedicalSuppliesQuantity,
                'deletedQuantity' => $medicalSupplies->deletedQuantity + $deletedQuantity,
            ]); 
            return redirect()->back()->with('success_message', 'Medical Supplies Deleted Successfully');
        }
    }

    //حذف مستلزم طبي ونقله للارشيف 

    public function softDelete($id)
    {
        $medicalSupplies = MedicalSupplies::findOrFail($id);

        $newMedicalSuppliesQuantity = 0;

        $medicalSupplies->update([
            'deletedQuantity' => $medicalSupplies->deletedQuantity + $medicalSupplies->quantity,
            'quantity' => $newMedicalSuppliesQuantity,
        ]); 


        // $medicalSupplies->delete();

        return redirect()->route('storeKeeper.medicalSupplies.index')->with('success_message', 'Medical Supplies Deleted Successfully');
    }
}
