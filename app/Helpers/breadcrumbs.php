<?php
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

function breadcrumbs()
{
    // Define inline CSS for the breadcrumb
    $inlineCss = "
        <style>
            .breadcrumbs {
                display: flex;
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            .breadcrumbs li {
                margin-right: 10px;
            }
            .breadcrumbs li a {
                text-decoration: none;
                color: #007bff;
            }
            .breadcrumbs li a:hover {
                text-decoration: underline;
            }
            .breadcrumbs li:last-child {
                font-weight: bold;
                color: #333;
            }
        </style>
    ";

    // Get the current URL and path
    $currentUrl = Request::url();
    $segments = explode('/', trim(Request::path(), '/')); // Split URL into segments
    $baseUrl = URL::to('/'); // Base URL for the home breadcrumb

    // Initialize breadcrumbs session if it doesn't exist
    if (!Session::has('breadcrumbs')) {
        Session::put('breadcrumbs', []);
    }

    // Get current page breadcrumb
    $currentBreadcrumb = ucfirst(str_replace('-', ' ', end($segments)));

    // Check if the "Home" button was clicked and reset the breadcrumb trail
    if ($currentUrl === $baseUrl) {
        Session::put('breadcrumbs', ['Home']);
    } else {
        // Get current breadcrumbs from session
        $breadcrumbs = Session::get('breadcrumbs');
        
        // If the current breadcrumb is not the last, add it to the trail
        if (end($breadcrumbs) !== $currentBreadcrumb) {
            // Only add the current breadcrumb if it's not already in the trail
            if (!in_array($currentBreadcrumb, $breadcrumbs)) {
                $breadcrumbs[] = $currentBreadcrumb;
            }
            // Store the updated breadcrumb trail
            Session::put('breadcrumbs', $breadcrumbs);
        }
    }

    // Start HTML for breadcrumbs
    $html = $inlineCss . '<nav><ol class="breadcrumbs">';

    // Home breadcrumb
    $html .= '<li><a href="' . $baseUrl . '">Home</a></li>';

    // Generate breadcrumbs for each stored segment
    $currentUrlPart = $baseUrl;
    foreach ($breadcrumbs as $breadcrumb) {
        // Convert breadcrumb to slug and generate link
        $currentUrlPart .= '/' . strtolower(str_replace(' ', '-', $breadcrumb));
        $html .= '<li><a href="' . $currentUrlPart . '">' . $breadcrumb . '</a></li>';
    }

    // Add current page as the last breadcrumb with dynamic title based on time
    $currentTitle = 'Current Page - ' . Carbon::now()->toFormattedDateString();
    $html .= '<li>' . $currentTitle . '</li>';

    // Close the breadcrumb list and return the HTML
    $html .= '</ol></nav>';

    return $html;
}
