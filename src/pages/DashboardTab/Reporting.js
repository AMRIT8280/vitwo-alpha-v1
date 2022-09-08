import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Button, Typography } from '@material-ui/core'
import Select from "react-dropdown-select"
import { Box,Grid, Link } from '@material-ui/core'
import {BiPlusCircle,BiXCircle,BiRightArrowAlt} from "react-icons/bi"
import Dialog from '@material-ui/core/Dialog'
import DialogActions from '@material-ui/core/DialogActions'
import DialogContent from '@material-ui/core/DialogContent'
import DialogContentText from '@material-ui/core/DialogContentText'
import Slide from '@material-ui/core/Slide'
import TextField from '@material-ui/core/TextField'
import FormGroup from '@material-ui/core/FormGroup'
import { pink } from '@mui/material/colors'
import Checkbox from '@mui/material/Checkbox'

const label = { inputProps: { 'aria-label': 'Checkbox demo' } };
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });

function Reporting(options) {
    const classes = useStyles();
    const [value, setValue] = React.useState(0);

    const handleChange = (event, newValue) => {
      setValue(newValue);
    };
    //  modal  //
  const [open, setOpen] = React.useState(false);

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };
    return (
        <div>
            <Grid container spacing={5}>
            <Grid item xs={6} sm={6}>
            <Box className={classes.Thcol}>
                <Box className={classes.col}><Typography style={{fontSize:18, color:'#919699'}}>Select Report Template</Typography></Box>
                <Box className={classes.col}><Typography style={{fontSize:18, color:'#919699'}}>Enable</Typography></Box>
            </Box>
            <Box className={classes.Tdcol}>
            <Box className={classes.col1}><label>CCQ</label><BiRightArrowAlt size="22" style={{marginLeft:40,}} /></Box>
            <Box className={classes.col2}><Checkbox {...label} defaultChecked color="success" /></Box>
            </Box>
            <Box className={classes.Tdcol}>
            <Box className={classes.col1}><label>Finalize</label><BiRightArrowAlt size="22" style={{marginLeft:40,}} /></Box>
            <Box className={classes.col2}><Checkbox {...label} defaultChecked color="success" /></Box>
            </Box>
            <Box className={classes.Tdcol}>
            <Box className={classes.col1}><label>Login-Logout</label><BiRightArrowAlt size="22" style={{marginLeft:40,}} /></Box>
            <Box className={classes.col2}><Checkbox {...label} defaultChecked color="success" /></Box>
            </Box>
            <Box className={classes.Tdcol}>
            <Box className={classes.col1}><label>Patient Engagement</label><BiRightArrowAlt size="22" style={{marginLeft:40,}} /></Box>
            <Box className={classes.col2}><Checkbox {...label} defaultChecked color="success" /></Box>
            </Box>
            <Box className={classes.Tdcol}>
            <Box className={classes.col1}><label>Population Assessment</label><BiRightArrowAlt size="22" style={{marginLeft:40,}} /></Box>
            <Box className={classes.col2}><Checkbox {...label} defaultChecked color="success" /></Box>
            </Box>
            </Grid>
</Grid>
                        {/* modal */}
                <Dialog  className={classes.modal}
        open={open}
        TransitionComponent={Transition}
        keepMounted
        onClose={handleClose}
        aria-labelledby="alert-dialog-slide-title"
        aria-describedby="alert-dialog-slide-description"
      >
        <DialogContent className={classes.ccmmodal}>
            <Box className={classes.ModalTop}>
                <Typography variant="h3" className={classes.TopHeading}>Add New User Permission</Typography>
            <Button onClick={handleClose} className={classes.closebtn}><BiXCircle className={classes.closeicon} /></Button>
            </Box>
          <DialogContentText id="alert-dialog-slide-description">
          <Box className={classes.loginform}>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
                      <Box className={classes.Formcol}>
                          <label>Program Name</label>
                          <TextField className={classes.input} placeholder="Enter Program Name"
                        type="text" style={{width:'70%'}} />
                      </Box>
                      <Typography variant="" style={{color:'#141621',fontFamily:'Poppins',fontSize:16, paddingBottom:20,display:'flex'}}>Select Permissions For New Template :</Typography>
                      <Box className={classes.checkCol}>
                          <Box className={classes.checkList}>
                              <label>Provider Info</label>
                              <Checkbox {...label} defaultChecked color="default" />
                          </Box>
                          <Box className={classes.checkList}>
                              <label>Billing</label>
                              <Checkbox {...label} defaultChecked color="success" />
                          </Box>
                          <Box className={classes.checkList}>
                              <label>User Setup</label>
                              <Checkbox {...label} defaultChecked color="success" />
                          </Box>
                          <Box className={classes.checkList}>
                              <label>Patient Upload</label>
                              <Checkbox {...label} defaultChecked color="default" />
                          </Box>
                          <Box className={classes.checkList}>
                              <label>Manage Care Team</label>
                              <Checkbox {...label} defaultChecked color="default" />
                          </Box>
                          <Box className={classes.checkList}>
                              <label>Reporting</label>
                              <Checkbox {...label} defaultChecked color="default" />
                          </Box>
                          <Box className={classes.checkList}>
                              <label>Program Setup</label>
                              <Checkbox {...label} defaultChecked color="success" />
                          </Box>
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Status</label>
                          <TextField className={classes.input} placeholder="Active"
                        type="text" style={{width:'30%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label style={{marginTop:0,}}>Date Added</label>
                          <Box style={{fontSize:14,color:'#141621'}}>04/22/2021</Box>
                      </Box>
                  </Grid>
                  
              </Grid>
            </form>
            </Box>
          </DialogContentText>
        </DialogContent>
        <DialogActions className={classes.modalbtn}>
        <FormGroup aria-label="position" row>
        </FormGroup>
        <Button size="large" className={classes.loginbtn}>
        Save
        </Button>
        </DialogActions>
      </Dialog>
        </div>
    )
}

export default Reporting
const useStyles = makeStyles(() => ({
    select:{
        width:'100%',
        border:'none !important',
        borderRadius:'10px !important',
        background:'#F1F1F1',
        height:'50px',
        fontSize:'18px !important',
        paddingLeft:'15px !important',
        paddingRight:'15px !important'
    },
    col1:{
        flexDirection:'row',
        display:'flex',
        alignItems:'center',
        '& label':{
width:250,
        }
    },
    Thcol:{
        display:'flex',
        flexDirection:'row',
        justifyContent:'space-between',
        marginBottom:15,
    },
    Tdcol:{
        display:'flex',
        flexDirection:'row',
        justifyContent:'space-between',
        marginBottom:20,
    },
    ModalTop:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        justifyContent:'space-between',
        
    },
    checkCol:{
        display:'flex',
        flexDirection:'row',
        flexWrap:'wrap',
        marginBottom:40,
    },
    checkList:{
        width:'50%',
        display:'flex',
        alignItems:'center',
        justifyContent:'flex-start',
        '& label':{
            width:200,
            color:'#141621'
        }
    },
    TopHeading:{
        fontFamily:'Poppins',
        fontSize:18,
    },
    addprovider:{
        fontSize:16,
        textTransform:'capitalize',
        color:'#7087A7',
        '&:hover':{
            background:'none',
            color:'#000'
        }
    },
    btncol:{
        marginTop:15,
    },
    icon:{
        color:'#7087A7',
        fontSize:'24px',
        marginRight:'30px'
      },
    backarrow:{
        color:'#8088A8',
        fontSize:'20px',
        marginRight:'8px'
    },
    Formcol:{
        display:'flex',
        alignItems:'flex-start',
        marginBottom:'30px',
        '&>div':{
            width:'100%'
        },
        '& p':{
            fontSize:'18px',
            margin:'0px'
        },
        '& label':{
            flex:'0 0 205px',
            color:'#000',
            fontSize:'15px',
            fontWeight:'400',
            marginTop:10,
        },
        '& .react-dropdown-select-input':{
            width:'100%'
        }
    },
    modal:{
        '& .MuiPaper-rounded':{
            borderRadius:'10px !important',
            padding:'20px',
            width:'776px',
            maxWidth:'776px'
        }
    },
    ccmmodal:{
        borderRadius:'10px',
    },
    modalbtn:{
        display:'flex',
        justifyContent:'space-between',
        marginRight:'30px',
        marginLeft:'15px',
        alignItems:'center'
    },
    closebtn:{
        width:'40px',
        position:'absolute',
        right:'10px',
        height:'40px',
        background:'#fff',
        top:'10px',
        minWidth:'40px',
        '&:hover':{
            background:'#fff'
        }
    },
    closeicon:{
        fontSize:'25px',
        color:'#7087A7'
    }, 
    loginform:{
        width:'100%',
        marginTop:40,
        '& .MuiInput-underline:before':{
            display:'none'
        },
        '& .MuiInput-underline:after':{
            display:'none'
        },
        '& .MuiInput-formControl':{ 
            height:'50px',
            
        },
        '& .MuiInputBase-input':{
            height:'50px',
            borderRadius:'10px',
            background:'#F1F1F1',
            padding:'0 15px'
        }
    },
    loginbtn:{
        background:'#7087A7',
        padding:'0 40px',
        width:'142px',
        height:'45px',
        borderRadius:'10px',
        color:'#fff',
        marginTop:'20px',
        '&:hover':{
            background:'#333'
        }
    },
}));