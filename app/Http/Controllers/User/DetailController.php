<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailStoreRequest;
use App\Http\Requests\DetailUpdateRequest;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $details = Detail::orderBy('created_at','desc')->get();
        return view('frontend.detail.index',compact('details'));
    }

    public function store(DetailStoreRequest $request)
    {
        $data = $request->except('image');

        // dd($data);
        $detail = Detail::create($data);
        if ($detail) {
            return redirect()->route('details.index')
                ->withSuccessMessage('Details is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Details can not be added.');

    }
    public function edit(Detail $detail)
    {
        // dd($detail);
        return view('frontend.detail.edit', compact('detail'));
    }

    public function update(DetailUpdateRequest $request, $id)
    {
      
        $data = $request->except('_token', '_method', 'image');
        
     
        // dd($data);
        $detail = Detail::where('id', $id)->update($data);
        if ($detail) {
            return redirect()->route('details.index')
                ->withSuccessMessage('Detail is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Detail can not be updated.');

    }

    public function destroy($id)
    {
        $detail = Detail::find($id)->delete($id);

        if ($detail) {
            return response()->json([
                'type' => 'success',
                'message' => 'Detail is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Detail can not be deleted.'
        ], 422);
    }

}
