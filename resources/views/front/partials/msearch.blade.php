<form action="{!!route('watch.index')!!}" id="searchmobile" style="display:none;" role="form" class="navbar-form navbar-search">
                <span class="twitter-typeahead" style="position: relative; display: inline-block;">
                    <input id="searchInput" type="text" class="search-input form-control typeahead tt-query" placeholder="Search Videos / Youtube video link" name="q" value="">
                    <input type="hidden" value="type">
                    <button type="submit" class="btn navbar-search-btn"><i class="fa fa-search btn-bg-blue"></i></button>
                </span>
            </form>