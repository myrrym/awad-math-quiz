import React, { Component, useState } from 'react';
import { Button, Modal, ModalHeader, ModalBody, Form, FormGroup, Label, Input } from 'reactstrap';

export default class Login extends Component {
    constructor() {
        super()
        this.state = {
            posts: []
        }
    }
    toggleNewPostModal() {
        this.setState({
            newPostModel: true
        })
    }
    render() {
        return (
            <div>
                <Button color="primary" onClick={this.toggleNewPostModal.bind(this)}>AddPost</Button>
                <Modal isOpen={this.state.newPostModal}
                    toggle={this.toggleNewPostModal.bind(this)}>
                    <ModalHeader toggle={this.toggleNewPostModal.bind(this)}> Add New Post</ModalHeader>
                    <ModalBody>
                        <FormGroup>
                            <Label for="title">Title</Label>
                            <Input id="title"></Input>
                        </FormGroup>
                        <FormGroup>
                            <Label for="content">Content</Label>
                            <Input id="content"></Input>
                        </FormGroup>
                        <FormGroup>
                            <Label for="user_id">User ID</Label>
                            <Input id="user_id"></Input>
                        </FormGroup>
                    </ModalBody>
                    <ModalFooter>
                        <Button color="primary" onClick={this.toggleNewPostModal.bind(this)}>
                            Add Post </Button>{' '}
                        <Button color="secondary"
                            onClick={this.toggleNewPostModal.bind(this)}> Cancel </Button>
                    </ModalFooter>
                </Modal>
            </div>
        );
    }
}

if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login'));
}





