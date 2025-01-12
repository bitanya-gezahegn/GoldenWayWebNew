
<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: goldenrod; /* blue-400 */
            color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .u-name {
            font-size: 20px;
            font-weight: bold;
        }

        .header i {
            font-size: 30px;
            cursor: pointer;
        }

        .header i:hover {
            color: #ffb038;
        }

        /* Sidebar */
        .side-bar {
            width: 250px;
            background-color: #F3F4F6; /* gray-300 */
            min-height: 100vh;
            padding-top: 20px;
            transition: 300ms width ease-in-out;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .side-bar ul {
            list-style: none;
            padding-left: 0;
        }

        .side-bar ul li {
            font-size: 16px;
            padding: 15px;
            padding-left: 20px;
            transition: 300ms background-color ease;
        }

        .side-bar ul li:hover {
            background-color: goldenrod; /* blue-400 */
            color: white;
        }

        .side-bar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            font-size: 16px;
            padding-right: 10px;
        }

        .side-bar ul li a i {
            margin-right: 15px;
            font-size: 20px;
        }

        /* Toggle Button */
        #checkbox {
            display: none;
        }

        #checkbox:checked ~ .body .side-bar {
            width: 60px;
        }

        #checkbox:checked ~ .body .side-bar .u-name,
        #checkbox:checked ~ .body .side-bar ul li a span {
            display: none;
        }

        /* Body Section */
        .body {
            display: flex;
            transition: margin-left 300ms ease-in-out;
        }

        /* Section Content */
        .section-1 {
            width: 100%;
            background-color: #F9FAFB; /* light gray */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 50px;
        }

        .section-1 h1 {
            font-size: 60px;
            color: goldenrod; /* blue-400 */
        }

        .section-1 p {
            color: goldenrod;
            font-size: 20px;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .user-p img {
            width: 100px;
            border-radius: 50%;
        }

        .user-p h4 {
            color: #333;
            padding: 5px 0;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .side-bar {
                width: 200px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .section-1 h1 {
                font-size: 40px;
            }
        }

    </style>
</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">DRIVER</b>
            
        </h2>
        <a href="/">
		<label for="checkbox">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </label>    </a>
    </header>

    <div class="body">
        <nav class="side-bar">
            <ul>
                 <li><a href="{{ route('redirect') }}"><i class="fa fa-calendar-check-o"></i><span>Dashboard</span></a></li>
                <li><a href="{{ url('scheduleview') }}"><i class="fa fa-users"></i><span>Schedules</span></a></li>
                <li><a href="{{ url('reportissues') }}"><i class="fa fa-address-book"></i><span>Report issues</span></a></li>
                <li><a href="{{ url('history') }}"><i class="fa fa-bullhorn"></i><span>History</span></a></li>
                <li><a href="{{ route('feedback.view') }}"><i class="fa fa-file"></i><span>Feedbacks</span></a></li>
            </ul>
      

               
            
              
              
        </nav>
        <section class="bg-gray-100 p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Feedback History</h1>

    <!-- No Feedback Message -->
    @if ($feedbacks->isEmpty())
        <p class="text-center text-gray-500">No feedbacks available yet.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm font-medium">
                        <th class="px-6 py-4 text-left border-b">Customer</th>
                        <th class="px-6 py-4 text-left border-b">Rating</th>
                        <th class="px-6 py-4 text-left border-b">Feedback</th>
                        <th class="px-6 py-4 text-left border-b">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 border-b">{{ $feedback->customer->name ?? 'Unknown' }}</td>
                            <td class="px-6 py-4 border-b">{{ $feedback->rating }} / 5</td>
                            <td class="px-6 py-4 border-b">{{ $feedback->feedback }}</td>
                            <td class="px-6 py-4 border-b">{{ $feedback->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</section>


    </div>

</body>
</html>
</x-app-layout>
