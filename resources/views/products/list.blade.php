<!DOCTYPE html>
 <html>
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
 </html>