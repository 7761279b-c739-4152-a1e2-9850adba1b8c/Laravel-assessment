@props(['order'])
<script>
function setSortOrder(select) {
    let option = select.value;
    if (!option) {return;}
    let url = new URL(window.location.href);
    url.searchParams.set('order', option);
    window.location.href = url;
}
</script>
<select onchange="setSortOrder(this)" class="m-2">
    <option value="nameasc"{{ $order == 'nameasc' ? ' selected="selected"' : ''}}>Name (A-Z)</option>
    <option value="namedesc"{{ $order == 'namedesc' ? ' selected="selected"' : ''}}>Name (Z-A)</option>
    <option value="timeasc"{{ $order == 'timeasc' ? ' selected="selected"' : ''}}>Date created (oldest)</option>
    <option value="timedesc"{{ $order == 'timedesc' ? ' selected="selected"' : ''}}>Date created (newest)</option>
</select>