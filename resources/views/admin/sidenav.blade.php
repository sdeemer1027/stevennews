<style>
        .sidebar {
/*            width: 200px; 
            background-color: #f0f0f0;*/
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ffffff;
            display: block;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #ccc;
              color: #000000;
        }
    </style>


        <nav class="sidebar">
            <!-- Left side navigation 
                {{-- route('admin.users') }}
{{ route('admin.roles') }}
{{ route('admin.permissions') }}

{{ route('admin.categories') --}}
            -->
              <ul>
                <li><a href="{{ route('admin.users') }}">Users</a>
                    <ul>
                        <li><a href="{{ route('admin.roles') }}">Roles</a></li>
                        <li><a href="#">Permissions</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('admin.articles.index') }}">Articles</a></li>
                <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
            </ul>
        </nav>