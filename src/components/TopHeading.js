import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Button, Typography } from '@material-ui/core';

function TopHeading() {
    const classes = useStyles();
    return (
        <div>
            <Typography variant="h4" className={classes.Toptext}>Enterprise Edition</Typography>
        </div>
    )
}

export default TopHeading
const useStyles = makeStyles(() => ({
    Toptext:{
        fontSize:'18px',
        color:'#000',
        textTransform:'capitalize',
        marginBottom:'20px',
        marginTop:22,
        fontWeight:'600',
        fontFamily:'Poppins'
    }
    
}));