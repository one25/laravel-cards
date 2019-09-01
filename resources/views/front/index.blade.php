@extends($layout . '.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                      <div class="row">
                          <div class="col-md-3 col-sm-4 col-xs-12">
                              <div class="form-group">
                                 <input type="text" name="query_search" class="form-control f-verify input-size" placeholder="helen" />
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-4 col-xs-12">
                              <div class="form-group">
                                  <button type="button" name="submit_search" value="searchproduct" class="btn btn-success add_upd_p" data-action="saved_new">Search User</button>
                              </div>
                          </div>    
                      </div>
                    <div class="table-responsive">
                      @if (session('card-updated'))
                          @component('back.components.alert')
                              @slot('type')
                                  success
                              @endslot
                              {!! session('card-updated') !!}
                          @endcomponent
                      @endif
                      <table>
                         <thead>
                          <tr>
                            @if($layout == 'back')
                            @guest
                            @else
                            @admin
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td> 
                            @endadmin
                            @redac
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td> 
                            @endredac    
                            @endguest  
                            @endif                            
                            <td>Number Card</td>
                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Name User</td>
                                   <td ><a href="#" class="sort" data-order="user_id" data-direction="asc">
                                      <img src="{{ asset('public/images/top.jpg') }}" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="user_id" data-direction="desc">
                                      <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                                   </a></td>  
                                 </tr>
                               </table>        
                            </td>
                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Type Card</td>
                                   <td><a href="#" class="sort" data-order="type_id" data-direction="asc">
                                      <img src="{{ asset('public/images/top.jpg') }}" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="type_id" data-direction="desc">
                                      <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                                   </a></td>  
                                 </tr>
                               </table>       
                            </td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('front.brick-standard', compact('cards'))
                         </tbody>    
                       </table>
                     </div>
                     <hr> <!-- cards->links() -->
                     <div id="pagination" class="box-footer">
                       {{ $links }}
                     </div>                     
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
    $(document).ready(function(){
       var url = '@if($layout == "front"){{route('home')}}@else{{route('dashboard')}}@endif'; 
       BaseRecord.errorAjax = '@lang('Looks like there is a server issue...')';
       BaseRecord.swalTitle = '@lang('Really destroy card ?')';
       BaseRecord.confirmButtonText = '@lang('Yes')';
       BaseRecord.cancelButtonText = '@lang('No')';                
       $('td a.sort').click(function () {
          BaseRecord.ordering(url, $(this), BaseRecord.errorAjax);
          return false;
       });
       $('button[name="submit_search"]').click(function () {
          BaseRecord.searching(url, $('input[name="query_search"]'), BaseRecord.errorAjax);
       });
       $('.listbuttonremove').click(function () {
          BaseRecord.destroy($(this), url, BaseRecord.swalTitle, BaseRecord.confirmButtonText, BaseRecord.cancelButtonText, BaseRecord.errorAjax);
          return false;
       });
    });    
    </script>
@endsection    
