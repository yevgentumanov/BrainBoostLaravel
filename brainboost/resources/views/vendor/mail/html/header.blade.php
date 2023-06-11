@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://brainboost.es/images/Logo.svg" class="logo" alt="Brainboost Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
