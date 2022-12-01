@extends('layout.app')
@section('content')

    <div>
        <label for="form_name">First name:</label><br>
        <input type="text" id="form_name" name="name"><br>
        <label for="form_surname">Last name:</label><br>
        <input type="text" id="form_surname" name="surname"><br><br>
        <button onclick='proccess();'>confirm</button>
        <button onclick='put();'>put</button>
    </div>



@stop

@section('js')
    <script>
        function proccess(){
            let data={
                'name': document.getElementById('form_name').value,
                'surname': document.getElementById('form_surname').value
            }
            fetch('/proccess2', {
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                method:'POST',
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(function(result){
                    alert(result);
                    console.log(result);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function put(){
            let data={
                'name': 'CLINTON',
                'surname': 'KENEDY'
            }
            fetch('estudiantes/1', {
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                method:'PUT',
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(function(result){
                    alert(result);
                    console.log(result);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>
@endsection

