<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Status;

class PackageController extends Controller
{

    public function addPackage(PackageRequest $request)
    {
        $package = [
            'details' => $request->details,
            'weight' => $request->weight,
            'delivery_to' => $request->delivery_to,
            'fk_id_customer' => $request->fk_id_customer,
            'fk_id_status' => 1, // 1 = "Warehouse"
        ];

        $validate_delivery_to = Package::where('delivery_to', $request->delivery_to)->first();

        if ($validate_delivery_to && $validate_delivery_to->fk_id_status == 1) {
            return response()->json([
                "message" => "There is already a package with the same delivery address."
            ], 400);
        } else {
            $validateUserExist = Customer::find($request->fk_id_customer);
            if ($validateUserExist) {
                $packageCreated = Package::create($package);

                if ($packageCreated) {
                    return response()->json([
                        "message" => "Package created successfully."
                    ], 200);
                } else {
                    return response()->json([
                        "message" => "There was an error creating the package."
                    ], 400);
                }
            } else {
                return response()->json([
                    "message" => "The user does not exist."
                ], 400);
            }
        }
    }

    public function getPackages(PackageRequest $request)
    {
        $statusExist = Status::find($request->fk_id_status);
        if ($statusExist) {

            $packages = Package::where('fk_id_status', $request->fk_id_status)->get();

            return response()->json([
                "packages" => $packages
            ], 200);
        } else {
            return response()->json([
                "message" => "The status does not exist."
            ], 400);
        }
    }

    public function updatePackage(PackageRequest $request)
    {
        $package = Package::find($request->id);

        if ($package) {
            $statusExist = Status::find($request->fk_id_status);
            if ($statusExist) {
                $package->fk_id_status = $request->fk_id_status;
                $package->save();

                return response()->json([
                    "message" => "Package updated successfully."
                ], 200);
            } else {
                return response()->json([
                    "message" => "The status does not exist."
                ], 400);
            }
        } else {
            return response()->json([
                "message" => "The package does not exist."
            ], 400);
        }
    }
}
