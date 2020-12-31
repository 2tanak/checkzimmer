@extends('layouts.app-single')

@section('content')

    @include('css.loader-single')

    <div class="container single-container">
        <div class="single-content not-active">
            <div class="left-part">
                <div class="main-block">
                    <div class="main-top-block">
                        <h1>Доступ к объекту запрещён</h1>
                        Пожалуйста, укажите PIN-код для доступа
                        <form method="post" action="">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control" name="pin">
                            </div>
                            @if ($access == false )
                                <span class="text-danger">Был указан неверный PIN-код</span>
                            @endif
                            <input type="submit"
                                   style="background: #6BB63F;border: none; border-radius: 6px;width: 100%;height: 54px; display: flex; align-items: center; justify-content: center; font-weight: 500; font-size: 16px; line-height: 100%; color: #FFFFFF; text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16); text-decoration: none; margin-bottom: 16px;"
                                value="Войти" />
                        </form>
                    </div>

                </div>

            </div>

        </div>
        @include('single.loader')
    </div>


@endsection
