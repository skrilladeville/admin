<?php

namespace App\Http\Controllers\GCCv1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FileController extends Controller
{
    /**
     * Generate needed js amd json files for a VueJs page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $role, $pagename, $ext)
    {
        global $ezSQL,$page,$user;

        $user['role'] = $role;
        $user['id'] = 27;
        $page['ext'] = $ext;
        $page['robustAdmin'] = 1;
        $page['apiPath'] = '/api/gccv1/src/'. $user['role'] .'/';
        $bridgePath = base_path() .'/app--gccv1/gcis/';
        
        include( $bridgePath. 'vuer.php' );
 
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
