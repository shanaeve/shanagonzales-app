<!DOCTYPE html>
 <html>
 <body>
 
     <p>Products: </p>
 
     <table>
 <x-layout>
     <x-slot:heading>
         Product List
     </x-slot>
     <x-table>
         <thead>
             <tr>
                 @foreach (['Id', 'Name', 'Category'] as $column)
                     <td>({$column})</td>
                 @endforeach
                 <th scope="col">#ID</th>
                 <th scope="col">Name</th>
                 <th scope="col">Category</th>
             </tr>
         </thead>
 
         <tbody>
             @foreach ($products as $product)
                 <tr>
                     <td>{{ $product['id'] }}</td>
                     <th scope="row">{{ $product['id'] }}</td>
                     <td>{{ $product['name'] }}</td>
                     <td>{{ $product['category'] }}</td>
                 </tr>
                 @endforeach
             @endforeach
         </tbody>
     </table>
     </x-table>
 </x-layout>
 
     <p>Tasks:</p>
 
     <ul>
         @foreach ($tasks as $task)
             <li>{{ $task }}</li>
         @endforeach
     </ul>
 
     <p>Global Variables:</p>
     <p>{{ $sharedVariable }}</p>
 
     <p> Product Key: {{ $productKey }}</p>
 </body>
 
 </html>