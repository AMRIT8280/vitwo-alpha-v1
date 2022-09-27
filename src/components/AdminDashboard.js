import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Button } from '@material-ui/core';

function AdminDashboard() {
    const classes = useStyles();
    return (
        <div>
            <Button className={classes.managebtn}>Admin Dashboard</Button>
        </div>
    )
}

export default AdminDashboard
const useStyles = makeStyles(() => ({
    managebtn:{
        width:'180px',
        height:'45px',
        background:'#430AE8',
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