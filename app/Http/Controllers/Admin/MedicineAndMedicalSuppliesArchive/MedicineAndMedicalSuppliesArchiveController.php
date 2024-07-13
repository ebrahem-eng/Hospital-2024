<?php

namespace App\Http\Controllers\Admin\MedicineAndMedicalSuppliesArchive;

use App\Http\Controllers\Controller;
use App\Models\MedicalSupplies;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineAndMedicalSuppliesArchiveController extends Controller
{
    //

    //اظهار صفحة ارشيف الادوية والمسلتزمات الطبية

    public function indexArchive()
    {
        $medicines = Medicine::withTrashed()->get();
        $medicalSupplieses = MedicalSupplies::withTrashed()->get();
        return view('admin.MedicineAndMedicalSupplies.archive', compact('medicines', 'medicalSupplieses'));
    }

    //استعادة كمية معينة من الادوية

    public function restoreCustomMedicine(Request $request , $id)
    {
     $medicineID = $id;
     $restoredQuantity = $request->input('restoredQuantity');
     $medicine = Medicine::findOrfail($medicineID);
     $originalQuantity = $medicine->quantity;
     $deletedQuantity = $medicine->deletedQuantity;

     if($restoredQuantity > $deletedQuantity)
     {
        return redirect()->back()->with('error_message_medicine' , 'You Cant Restore More Than Deleted Quanitty');
     }else 
     {  
        $medicine->update([
            'deletedQuantity' => $deletedQuantity - $restoredQuantity,
            'quantity' => $originalQuantity + $restoredQuantity,
        ]);
        // $medicine->restore();

        return redirect()->back()->with('success_message_medicine' , 'Medicine Restored Successfully');
     }

    }

    //استعادة كمية محدودة من المستلزمات الطبية

    public function restoreCustomMedicalSupplies(Request $request , $id)
    {

        $medicalSuppliesID = $id;
        $restoredQuantity = $request->input('restoredQuantity');
        $medicalSupplies = MedicalSupplies::findOrfail($medicalSuppliesID);
        $originalQuantity = $medicalSupplies->quantity;
        $deletedQuantity = $medicalSupplies->deletedQuantity;
   
        if($restoredQuantity > $deletedQuantity)
        {
           return redirect()->back()->with('error_message_medicalSupplies' , 'You Cant Restore More Than Deleted Quanitty');
        }else 
        {  
           $medicalSupplies->update([
               'deletedQuantity' => $deletedQuantity - $restoredQuantity,
               'quantity' => $originalQuantity + $restoredQuantity,
           ]);
   
           return redirect()->back()->with('success_message_medicalSupplies' , 'Medical Supplies Restored Successfully');
        }

    }


    //استعادة جميع الادوية

    public function restoreAllMedicine($id)
    {
        $medicineID = $id;
        $medicine = Medicine::findOrfail($medicineID);
        $deletedQuantity = $medicine->deletedQuantity;

        $medicine->update([

            'quantity' => $deletedQuantity,
            'deletedQuantity' => '0'

        ]);

        return redirect()->back()->with('success_message_medicine' , 'All Medicine Restored Successfully');
    }

        //استعادة جميع المستلزمات الطبية؛

    public function restoreAllMedicalSupplies($id)
    {
        $medicalSuppliesID = $id;
        $medicalSupplies = MedicalSupplies::findOrfail($medicalSuppliesID);
        $deletedQuantity = $medicalSupplies->deletedQuantity;

        $medicalSupplies->update([
            'quantity' => $deletedQuantity,
            'deletedQuantity' => '0'

        ]);

        return redirect()->back()->with('success_message_medicalSupplies' , 'All Medical Supplies Restored Successfully');
    }


    //حذف الادوية بشكل نهائي

    public function forceDeleteMedicine($id)
    {
        $medicineID = $id;
        $medicine = Medicine::findOrfail($medicineID);
        $medicine->forceDelete();

        return redirect()->back()->with('success_message_medicine' , 'All Medicine Deleted Successfully');
    
    } 

       //حذف المستلزمات الطبية بشكل نهائي

    public function forceDeleteMedicalSupplies($id)
    {
        $medicalSuppliesID = $id;
        $medicalSupplies = MedicalSupplies::findOrfail($medicalSuppliesID);
        $medicalSupplies->forceDelete();

        return redirect()->back()->with('success_message_medicalSupplies' , 'All Medical Supplies Deleted Successfully');

    }
    


}
