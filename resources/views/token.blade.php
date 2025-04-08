<form method="POST" action="/token">
     @csrf
 
 
     Search term: <input type="text" name="term" value="" />
     <button type="submit">Go</button>
 </form>
 
 
 <div>
     Products:
     <table>
         <thead>
             <tr>
                 <td>Id</td>
                 <td>Name</td>
                 <td>Category</td>
             </tr>
         </thead>
         @foreach ( $products as $product)
         <tbody>
             <tr>
                 <td>{{ $product['id'] }}</td>
                 <td>{{ $product['name'] }}</td>
                 <td>{{ $product['category'] }}</td>
             </tr>
         </tbody>
         @endforeach
     </table>
 </div>