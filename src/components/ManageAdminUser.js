import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Button } from '@material-ui/core';

function ManageAdminUser() {
    const classes = useStyles();
    return (
        <div>
            <Button className={classes.managebtn}>Manage Admin Users</Button>
        </div>
    )
}

export default ManageAdminUser
const useStyles = makeStyles(() => ({
    managebtn:{
        width:'180px',
        height:'45px',
        background:'#E8740A',
        borderRadius:'10px',
        fontSize:'14px',
        color:'#fff',
        textTransform:'capitalize',
        marginBottom:'20px',
        '&:hover':{
            background:'#000'
        }
    }
    
}));