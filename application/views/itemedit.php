<h1>Task # {id}</h1>
<form role="form" action="/mtce/submit" method="post">
    {ftask}
    {fpriority}
    {fsize}
    {fgroup}
    {fstatus}
    {zsubmit}
    <a href="/mtce/cancel"><input id="cancel_edit_button" type="button" class="btn btn-default" value="Cancel the current edit"/></a>
    <a href="/mtce/delete"><input type="button" class="btn btn-danger" value="Delete this todo item"/></a>
</form>
{error}