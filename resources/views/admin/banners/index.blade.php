@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1>Управление баннерами</h1>
        
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Добавить новый баннер</a>
        </div>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Идентификатор страницы</th>
                    <th>Баннер</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td>{{ $banner->page_identifier }}</td>
                        <td>
                            @if ($banner->banner)
                                <img src="{{ asset('storage/' . $banner->banner) }}" class="img-fluid" style="max-height: 100px;">
                            @else
                                Нет баннера
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning">Изменить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

