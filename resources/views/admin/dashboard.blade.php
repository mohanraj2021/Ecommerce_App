<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row ">
        <div class="">
            @include('layouts.admin.adminSidenav')
        </div>

        <div class="flex-auto">
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="relative">
                                <div class="absolute right-0"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="toggleModal('modal-example-small')">
                                        Add Product
                                    </button></div>
                            </div>
                            <br>
                            <br>

                            <div class="flex flex-col text-left">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                            Name
                                                        </th>
                                                        <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                            Cost Price
                                                        </th>
                                                        <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                            Selling Price
                                                        </th>
                                                        <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                            Action
                                                        </th>
                                                        <!-- <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th> -->
                                                    </tr>
                                                </thead>
                                                @foreach($products as $key => $product)

                                                <tbody class="bg-white divide-y divide-gray-200">

                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <!-- <div class="flex-shrink-0 h-10 w-10">
                                                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1620037624682-f9c156d0286f?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=100&ixid=MnwxfDB8MXxyYW5kb218fHx8fHx8fHwxNjIwMTk4Mzc2&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=100" alt="" />
                                                                </div> -->
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        <b>{{$product->product_name}}</b>
                                                                    </div>
                                                                    <!-- <div class="text-sm text-gray-500">
                                                                        nida.povey@example.com
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <!-- <div class="text-sm text-gray-900">CMO</div> -->
                                                            <div class="text-sm text-gray-500">{{$product->cost_price}}</div>
                                                        </td>
                                                        <!-- <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Active
                                                            </span>
                                                        </td> -->
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{$product->selling_price}}
                                                        </td>
                                                        <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-example-small">

            <div class="relative p-1 flex-auto">
                <div class="relative w-auto my-6 mx-auto max-w-sm">
                    <!--content-->
                    <form method="POST" action="{{ route('admin.add_product') }}">
                        @csrf
                        <div class=" border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                            <div class=" flex items-start justify-between p-5 border-b border-solid border-gray-200 rounded-t">
                                <h3 class="text-3xl font-semibold">Add Product</h3>
                                <button class=" p-1 ml-auto bg-transparent border-0 text-gray-300 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-example-small')">
                                    <span class=" bg-transparent h-6 w-6 text-2xl block outline-none focus:outline-none">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            </div>
                            <!--body-->

                            <div class="relative p-6 flex-auto">
                                <div class="mb-3 pt-0">
                                    <input type="text" name="name" required placeholder="Product Name" class=" px-2 py-2 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full" />
                                </div>
                                <div class="mb-3 pt-0">
                                    <input type="text" required name="cost_price" placeholder="Cost Price" class=" px-1 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full" />
                                </div>
                                <div class="mb-3 pt-0">
                                    <input type="text" required name="selling_price" placeholder="Selling Price" class=" px-1 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full" />
                                </div>
                                <!-- <div class="mb-3 pt-0">
                                    <input type="text" name="option3" placeholder="Option 3" class=" px-1 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full" />
                                </div>
                                <div class="mb-3 pt-0">
                                    <input type="text" name="option4" placeholder="Option 4" class=" px-1 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full" />
                                </div>

                                <div class="mb-3 pt-0">
                                    <input type="text" name="answer" placeholder="Answer" class=" px-1 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full" />
                                </div> -->

                                <!-- <div class="mb-3 pt-0"> -->
                                <!-- <input type="text" placeholder="Subject" class=" px-1 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full"/> -->
                                <!-- <label class="block text-left" style="max-width: 300px">
                                        <span class="text-gray-700">Subject</span>
                                        <select name="subject[]" class="form-multiselect block w-full mt-1" multiple>
                                            <option value="maths">Mathematics</option> -->
                                <!-- <option value="">Option 2</option>
                                                <option value="">Option 3</option>
                                                <option value="">Option 4</option>
                                                <option value="">Option 5</option> -->
                                <!-- </select>
                                    </label> -->
                                <!-- </div> -->
                            </div>

                            <!--footer-->
                            <div class=" flex items-center justify-end p-6 border-t border-solid border-gray-200 rounded-b">
                                <button class=" text-purple-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-example-small')">
                                    Close
                                </button>
                                <button class=" bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 " type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-example-small-backdrop"></div>


    </div>
    <script language="JavaScript">
        function toggle(id) {
            var state = document.getElementById(id).style.display;
            if (state == 'block') {
                document.getElementById(id).style.display = 'none';
            } else {
                document.getElementById(id).style.display = 'block';
            }
        }

        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document
                .getElementById(modalID + "-backdrop")
                .classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
</x-app-layout>