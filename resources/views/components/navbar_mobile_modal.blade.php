<!-- Modal per il login e register nella versione mobile-->
<div class="modal fade" id="loginModal" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header navbar-custom">
                 <h5 class="modal-title text-light"> {{ __('ui.Itseems')}} </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p><strong>Log in</strong> o <strong> {{ __('ui.createanaccount')}} </strong> {{ __('ui.tobeable')}} </p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn-custom-orange" data-bs-dismiss="modal"> {{ __('ui.cancel')}} </button>
                 <a href="/login" class="btn-custom-greenwater">Login</a>
                 <a href="/register" class="btn-custom-greenwater">Register</a>
             </div>
         </div>
     </div>
 </div>