<article class="flex items-start space-x-6 p-6">
    <img src="https://ui-avatars.com/api/?name={{urlencode($product->name)}}&color=7F9CF5&background=EBF4FF" alt="{{ $product->name }}" alt="avatar" width="60" height="88"
        class="flex-none rounded-md bg-gray-100" />
    <div class="min-w-0 relative flex-auto">
        <h2 class="font-semibold text-gray-900 pr-20">{{$product->code}} - {{$product->name}}</h2>
        <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
            <div class="absolute top-0 right-0 flex items-center space-x-1">
                <dt class="text-sky-500">
                    <span class="sr-only">{{__('show')}}</span>
                    <svg width="16" height="20" fill="currentColor">
                        <path
                            d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                    </svg>
                </dt>
                <dd>{{__('show')}}</dd>
            </div>
            <div>
                <dt class="sr-only">category</dt>
                <dd class="px-1.5 ring-1 ring-gray-200 rounded">{{$product->category->name}}</dd>
            </div>
            <div class="ml-2">
                <dt class="sr-only">price</dt>
                <dd>${{$product->sale_price}}</dd>
            </div>
            <div>
                <dt class="sr-only">{{__('supplier')}}</dt>
                <dd class="flex items-center">
                    <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                        aria-hidden="true">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    {{$product->created_at}}
                </dd>
            </div>
            <div>
                <dt class="sr-only">stock</dt>
                <dd class="flex items-center">
                    <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                        aria-hidden="true">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    stock {{$product->stock}}
                </dd>
            </div>
            <div class="flex-none w-full mt-2 font-normal">
                <dt class="sr-only">{{__('description')}}</dt>
                <dd class="text-gray-400">{{$product->description}}</dd>
            </div>
        </dl>
    </div>
</article>
