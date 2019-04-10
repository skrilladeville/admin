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
        ob_start();
        include( base_path() .'/app--gccv1/gcis/vuer.html.php' );
        $html = ob_get_contents();
        ob_end_clean();

        return response()->json([
            'page' => $page,
            'html' => $html
        ]);
    }
}