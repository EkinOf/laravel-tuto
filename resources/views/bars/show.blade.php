@extends('layouts.web')

@section('title')
    {{ $bar->name }}
@endsection

@section('content')
    <div id="app">
        <h1>Liste des stocks :</h1>
        <ul>
           <li v-for="(row, key) in bar.stocks" :key="key">
               @{{ row.drink.name }} : <input type="number" v-model="row.quantity"> <button type="button" @click="updateStock(row)">Mettre à jour</button>
           </li>
        </ul>

        <h2>Ajouter une boisson au catalogue : </h2>
        {!! Form::open(['route' => 'stocks.store']) !!}
            <input type="hidden" name="bar_id" :value="bar.id">
            <label for="drink_id">Liste des boissons</label>
            <br>
            <select name="drink_id">
                <option v-for="(drink, drinkKey) in newDrinks" :key="drinkKey" :value="drink.id">
                    @{{ drink.name }}
                </option>
            </select>
            <br>
            <label for="quantity">Quantité</label>
            <input name="quantity" type="number">
            <br>
            <br>
            {!! Form::submit('Ajouter la boisson') !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            data: {
                bar: @json($bar),
                newDrinks: @json($newDrinks),
            },
            methods: {
                updateStock: function (stock) {
                    this.$http.put('{!! route('stocks.index') !!}/'+stock.id, {
                      quantity: stock.quantity,
                    }).then(response => {
                        window.location.reload();
                    }).error(error => {
                        console.log(error);
                    });
                }
            }
        });
    </script>
@endsection
