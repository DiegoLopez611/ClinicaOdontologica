<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Citas Programadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('citas.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Nueva Cita</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Codigo</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre del Paciente</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre del Medico</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Fecha</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $cita->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $cita->paciente_id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $cita->medico_id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $cita->fecha }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $cita->hora }}</td>
                                


                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $cita->id }}')">Eliminar</button>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // forma 1
    function confirmDelete(id) {
        alertify.confirm("¿Confirmación Eliminación?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/citas/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
            alertify.success('Ok');
        },
        function(){
            alertify.error('Cancel');
        });
    }

// forma 2
/* function confirmDelete(id) {
    alertify.confirm("¿Confirm delete record?", function (e) {
        if (e) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/students/' + id;
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
        } else {
            alertify.error('Cancel');
            return false;
        }
    });
} */
</script>