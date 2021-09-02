<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mailer') }}
        </h2>
    </x-slot>

    <div class="bg-gray-300 py-12">
        <div class="w-3/5 mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl sm:rounded-lg">
                <div class="">
                    @if(session('statusSend'))
                    <div class="p-4 mb-3 bg-green-100 rounded shadow-xl">
                        <p class="text-green-500">E-email enviado com sucesso!</p>
                    </div>
                    @endif

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                <div class="">
                                    <div class="">
                                        <label for="name" class="block text-sm font-medium text-gray-700">
                                            Nome do destinatário
                                        </label>
                                        <div class="mt-1 flex flex-col rounded-md shadow-sm">
                                            <input type="text" name="name" id="name" class="py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded rounded-r-md sm:text-sm border-gray-300" placeholder="Fulano de tal">
                                        </div>
                                        @error('name') <span class="mt-3 text-sm text-red-500">{{ $errors->first('name') }}</span> @enderror

                                    </div>
                                </div>

                                <div class="">
                                    <div class="">
                                        <label for="email_destinate" class="block text-sm font-medium text-gray-700">
                                            Destinatário
                                        </label>
                                        <div class="mt-1 flex flex-col rounded-md shadow-sm">
                                            <input type="email" name="email_destinate" id="email_destinate" class="py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded rounded-r-md sm:text-sm border-gray-300" placeholder="fulanodetal@gmail.com">
                                        </div>
                                    </div>
                                    @error('email_destinate') <span class="mt-3 text-sm text-red-500">{{ $errors->first('email_destinate') }}</span> @enderror
                                </div>

                                <div class="">
                                    <div class="">
                                        <label for="email_subject" class="block text-sm font-medium text-gray-700">
                                            Assunto
                                        </label>
                                        <div class="mt-1 flex flex-col rounded-md shadow-sm">
                                            <input type="text" name="email_subject" id="email_subject" class="py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded rounded-r-md sm:text-sm border-gray-300" placeholder="Digite aqui o assunto">
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="h-40">
                                        <label for="email_body" class="block text-sm font-medium text-gray-700">
                                            Texto do corpo
                                        </label>
                                        <div class="h-full mt-1 flex flex-col rounded-md shadow-sm">
                                            <textarea name="email_body" id="email_body" class="mb-3 h-40 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded rounded-r-md sm:text-sm border-gray-300">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Adicionar Anexo
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Adicione um anexo</span>
                                                    <input type="file" id="file-upload" name="file-upload" class="sr-only">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                PNG, JPG, PDF, DOCX up to 10MB
                                            </p>
                                        </div>
                                    </div>
                                    @error('file-upload') <span class="mt-3 text-sm text-red-500">{{ $errors->first('file-upload') }}</span> @enderror
                                </div>

                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Disparar
                                </button>
                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>