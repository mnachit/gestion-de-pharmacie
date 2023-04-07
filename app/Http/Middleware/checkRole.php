<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->Role == 'USER'){
            return $next($request);
        }
        else
        {
            $response = response()->view('G_P.index');
            $modal = '
            <div class="modal fade mt-5" id="delet">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="POST" id="form-task">
                            @csrf
                            <div class="modal-header">
                                <input type="hidden" id="task-idd4" name="idd4">
                                <h5 class="modal-title text-danger">Delet Product</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <input type="hidden" id="task-id1" name="idd1">
                            <div style="margin-left:4cm; margin-top:0.5cm; margin-bottom:0.5cm">
                                <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" name="saveedit" class="btn btn-primary task-action-btn" id="task-save-btn">confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
            $response->setContent($response->getContent() . $modal);
            return $response;
        }
    }
}
