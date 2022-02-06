<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-8">
                <a href="{{route('admin.categories.create')}}" class="px-6 py-2 bg-green-600 shadow text-white font-bold rounded">Criar Categoria</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="font-semi px-6 py-4 text-center text-xs text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col" class="font-semi px-6 py-4 text-center text-xs text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center text-xs font-semi text-gray-500 uppercase tracking-wider">
                                        Criado Em
                                    </th>
                                    <th scope="col" class="w-48  px-6 py-4 text-center text-xs font-semi text-gray-500 uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($categories as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                            {{$product->id}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                            {{$product->name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                            {{$product->created_at->format('d/m/Y H:i:s')}}
                                        </td>
                                        <td class="w-48 px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 flex justify-between">
                                            <a href="{{route('admin.categories.edit', $product)}}" class="text-blue-500 hover:text-blue-200 font-bold hover:underline
                                                transition-all ease-in-out duration-200">EDITAR</a>


                                            <form action="{{route('admin.categories.destroy', $product)}}" class="destroyButton" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button
                                                   class="text-red-500 hover:text-red-200 font-bold hover:underline transition-all ease-in-out duration-200"
                                                >REMOVER</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500"><h3>Nenhum produto encontrado em sua loja</h3></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8">
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>