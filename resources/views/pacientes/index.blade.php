<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('pacientes.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Nuevo Paciente</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Identificación</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombres</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Apellidos</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Telefono</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Correo Electronico</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Edad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pacientes as $paciente)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $paciente->identificacion }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $paciente->nombres }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $paciente->apellidos }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $paciente->telefono }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $paciente->correoElectronico }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $paciente->edad }}</td>




                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('pacientes.edit', $paciente->identificacion) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $paciente->identificacion }}')">Eliminar</button>

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
    function confirmDelete(identificacion) {
        alertify.confirm("¿Confirmación Eliminación?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/pacientes/' + identificacion;
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