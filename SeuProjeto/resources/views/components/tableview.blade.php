<div>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-8  d-flex justify-content-center gap-lg-3 align-items-center nowrap">
            <span class="fs-2 text-black bold text-center ">
                {{mb_strtoupper($title, 'UTF-8')}}
            </span>
        </div>
        <div class="col-2">
            @if($create != "")
            @if($id != "")
            <a href="{{ route($create) }}" class="btn btn-primary">
                
            @else
                <a href="{{ route($create, $id) }}" class="btn btn-primary">
                    Criar novo projeto
            @endif
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </a>
            @endif
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="col d-flex justify-content-center">
            @if($data instanceof \Illuminate\Pagination\AbstractPaginator)
                {{$data->links()}}
            @endif
        </div>
    </div>
    <table class="table align-middle caption-top table-striped">
        <thead>
            <tr>
                @php
                    $cont=0;
                @endphp
                @foreach ($header as $item)
                    @if($hide[$cont])
                    <th scope="col" class="d-none d-md-table-cell text-center"> 
                        {{mb_strtoupper($item, 'UTF-8')}}
                    </th>
                    @else
                    <th scope="col">
                        {{mb_strtoupper($item, 'UTF-8')}}
                    </th>
                    @endif
                @endforeach
            </tr>
        </thead>
    </table>

</div>