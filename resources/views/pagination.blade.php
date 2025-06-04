<?php
/** @var \Illuminate\Pagination\LengthAwarePaginator */

?>

          @if($paginator->hasPages()) <!-- Verificamos si hay páginas para mostrar la paginación -->

            <nav class="pagination my-large">
                  @if($paginator->onFirstPage()) <!-- Si estamos en la primera página, no se mostrará el enlace de retroceso -->
                   <span  class="pagination-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" style="width: 18px">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </span>
                  @else <!-- Si no estamos en la primera página, se mostrará el enlace de retroceso -->
                  <a href="{{$paginator->previousPageUrl()}}" class="pagination-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" style="width: 18px">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                  </a>
                  @endif

                  @foreach($elements as $element) <!-- Iteramos sobre los elementos de la paginación -->
                    @if(is_string($element))
                     <span class="pagination-item"> {{$element}} </span>
                    @endif

                    @if(is_array($element)) <!-- Si el elemento es un array, significa que contiene páginas -->
                      @foreach($element as $page => $url) <!-- Iteramos sobre las páginas -->
                        @if($page == $paginator->currentPage()) <!-- Si la página actual es igual a la página del elemento -->
                            <span class="pagination-item active"> {{ $page }} </span> <!-- Mostramos la página actual como activa -->
                        @else
                        <a href="{{$url}}" class="pagination-item"> {{$page}} </a> <!-- Si no es la página actual, mostramos un enlace a esa página -->
                        @endif
                      @endforeach
                        @endif
                    @endforeach
                      

                  @if($paginator->hasMorePages())  <!-- Verificamos si hay más páginas para mostrar el enlace de avance -->
                  <a href="{{$paginator->nextPageUrl()}}" class="pagination-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" style="width: 18px">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                  </a>
                  @else  <!-- Si no hay más páginas, mostramos un icono sin enlace -->
                  <span class="pagination-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" style="width: 18px">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                  @endif
            </nav>

          @endif