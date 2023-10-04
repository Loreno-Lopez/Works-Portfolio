 <!-- Modal per il cambio di lingua nella versione mobile-->
 <div class="modal fade" id="languageModal" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header navbar-custom">
                 <h5 class="modal-title text-light">{{ __('ui.Change')}}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body d-flex justify-content-around align-items-center">
                 <li class="nav-link navbar-hover-link">
                     <x-locale lang="it" nation="it"  class="mx-auto" />
                     <p class="text-center  mx-auto"><strong>{{ __('ui.ita')}}</strong></p>
                 </li>

                 <li class="nav-link navbar-hover-link">
                     <x-locale lang="en" nation="gb" />
                     <p class="text-center"><strong>{{ __('ui.eng')}}</strong></p>
                 </li>

                 <li class="nav-link navbar-hover-link">
                     <x-locale lang="es" nation="es" />
                     <p class="text-center"><strong>{{ __('ui.es')}}</strong></p>
                 </li>
             </div>
             <div class="modal-footer d-flex justify-content-end align-items-center">
                 <button type="button" class="btn-custom-greenwater me-2" data-bs-dismiss="modal">{{ __('ui.cancel')}}</button>
             </div>
         </div>
     </div>
 </div>