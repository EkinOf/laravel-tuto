@extends('layouts.web')

@section('title')
    Liste des bars
@endsection

@section('content')
    <div id="app">
        <a href="{!! route('bars.create') !!}">Créer un bar</a>
        <h1>Liste des bars :</h1>
        <ul>
            <li v-for="(bar, barKey) in bars" :key="barKey">
                @{{ bar.name }} : @{{ bar.location }} <a :href="'{!! route('bars.index') !!}/'+bar.id">Aller sur le page</a> <button style="margin-left: 25px" type="button" @click="destroyBar(bar.id)">Supprimer le bar</button>
                <br>
                <br>
            </li>
        </ul>
    </div>
@endsection

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            data: {
                bars: @json($bars),
            },
            methods: {
                destroyBar: function (id) {
                    this.$http.delete('{!! route('bars.index') !!}/'+id)
                    .then(response => {
                        window.location.reload();
                    }).error(error => {
                       console.log(error);
                    });
                }
            }
        });
    </script>
@endsection
