<div>

    <x-jet-button wire:click="$set('open', true)">
        Nuevo
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Nuevo proveedor
        </x-slot>

        <x-slot name="content">
            <div class="mt-10 sm:mt-0">

                {{-- formulario --}}
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="documento" class="block text-sm font-medium text-gray-700">Documento</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <select id="letra" name="letra"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md" wire:model="letra">
                                            <option>V</option>
                                            <option>E</option>
                                            <option>J</option>
                                        </select>
                                    </div>
                                    <input type="text" name="numero_documento" id="numero_documento"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Cédula o RIF" wire:model="documento">
                                </div>
                                <x-jet-input-error for="letra" />
                                <x-jet-input-error for="documento" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" name="nombre" id="nombre"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    wire:model="nombre">
                                <x-jet-input-error for="nombre" />
                            </div>

                            <div class="col-span-6">
                                <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto</label>
                                <input type="text" name="contacto" id="contacto" autocomplete="street-address"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    wire:model="contacto">
                                <x-jet-input-error for="contacto" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <select id="codigo" name="codigo"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md"
                                            wire:model="codigo">
                                            <option value="0">----</option>
                                            <option>0412</option>
                                            <option>0414</option>
                                            <option>0416</option>
                                            <option>0424</option>
                                            <option>0426</option>
                                        </select>
                                    </div>
                                    <input type="text" name="telefono" id="telefono"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-16 sm:text-sm border-gray-300 rounded-md"
                                        wire:model="numeroTelefono">
                                </div>
                                <x-jet-input-error for="codigo" />
                                <x-jet-input-error for="numeroTelefono" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" name="email" id="email" autocomplete="email"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    wire:model="email">
                                <x-jet-input-error for="email" />
                            </div>

                            <div class="col-span-6">
                                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                                <input type="text" name="direccion" id="direccion"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    wire:model="direccion">
                                <x-jet-input-error for="direccion" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /formulario --}}

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="save()" wire:loading.attr="disabled" class="disabled:opacity-25">
                Registrar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
