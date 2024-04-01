<style>
        .sidebar {
/*            width: 200px; */
            background-color: #f0f0f0;
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;            
        }

        .sidebar ul li {
 /*           margin-bottom: 10px;  */
            padding: 5px;
             color: #333;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 5px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #ccc;
        }
    </style>


        <nav class="sidebar">
            <!-- Left side navigation -->
              <ul>                
                <li><a href="{{ route('articles') }}">Articles</a></li>
                <li>Categories<hr>
                	<ul>
                		@foreach($categories as $category)
                		<li><a href="{{ route('articlescategory', ['category' => $category->name]) }}">{{$category->name}}</a></li>
                        @endforeach
                	</ul>


                </li>
            </ul>
        </nav>
        {{--$categories--}}