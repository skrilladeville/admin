<?php

namespace App\Http\Controllers\GCCv1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    /**
     * Get the specified GCCv1 page for a role.
     *
     * @param  Request  $request
     * @param  string  $role
     * @return Response
     */
    public function gccPage(Request $request, $role, $pagename)
    {       
        //$uri = $request->path();
        include( base_path() .'\app--gccv1\gcis\vuer.html.php' );

        return;
	}
}
