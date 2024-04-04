<style>
        .sidebar {
/*            width: 200px; 
            background-color: #fcfcfc;*/
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;            
        }

        .sidebar ul li {
 /*           margin-bottom: 10px;  */
            padding: 5px;
             color: #ffffff;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ffffff;
            display: block;
            padding: 5px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #ccc;
            color: #000000;
        }
    </style>


        <nav class="sidebar">
            <!-- Left side navigation -->
              <ul>                
                <li><a href="{{ route('articles') }}">Articles</a></li>
                <li>
                	<ol>
                		@foreach($categories as $category)
                		<li><a href="{{ route('articlescategory', ['category' => $category->name]) }}">{{$category->name}}</a></li>
                        @endforeach
                	</ol>


                </li>
            </ul>
        </nav>
        {{--$categories--}}