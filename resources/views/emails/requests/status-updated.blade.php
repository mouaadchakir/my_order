<x-mail::message>
# Your Request Status has been Updated

Hello {{ $request->customer_name }},

This is an update regarding your made-to-measure request.

The status of your request has been updated to: **{{ $request->status }}**

Thank you for your patience. We will notify you again with any further updates.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>