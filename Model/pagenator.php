<?php

class Paginator { 

    function pageList($pgSelf, $pgPage, $totCnt, $cntPerPage, $pgLinkCnt, $condition ){ 

        $pgLink = "";

        $pgTots = ceil($totCnt / $cntPerPage);
        $pgPage = $pgPage ? $pgPage:($pgTots ? 1:0);

        $pgStrt = $pgPage ? (floor($pgPage/$pgLinkCnt)*$pgLinkCnt+1):0;
        if($pgStrt >$pgPage) { $pgStrt -= $pgLinkCnt; } 

        $pgFnsh = $pgStrt ? ($pgStrt+$pgLinkCnt-1):0;
        if($pgFnsh >=$pgTots) { $pgFnsh = $pgTots; } 

        $pgFrst = ($pgStrt > $pgLinkCnt*2) ? 1:0;
        $pgPrev = ($pgStrt > $pgLinkCnt) ? ($pgStrt -1):0;
        $pgNext = (($pgStrt+$pgLinkCnt) <= $pgTots) ? ($pgFnsh+1):0;
        $pgLast = (($pgStrt+$pgLinkCnt*2) <= $pgTots) ? ($pgTots):0;

        $pgLink .= $pgFrst ? " <a href=".$pgSelf."?pgPage=$pgFrst$condition>First</a>":""; 
        $pgLink .= $pgPrev ? " <a href=".$pgSelf."?pgPage=$pgPrev$condition>Prev</a>":""; 

        for($i=$pgStrt; $i<=$pgFnsh; $i++) { 
          if($pgPage == $i) { $pgLink .= " <b>$i</b>"; } 
          else { $pgLink .= " <a href=".$pgSelf."?pgPage=$i$condition>$i</a>"; } 
        } 

        $pgLink .= $pgNext ? " <a href=".$pgSelf."?pgPage=$pgNext$condition>Next</a>":""; 
        $pgLink .= $pgLast ? " <a href=".$pgSelf."?pgPage=$pgLast$condition>Last</a>":""; 

        echo "<center>";
        echo $pgLink;
        echo "</center>";
        
        return $pgLink;
    }
    
}

?>